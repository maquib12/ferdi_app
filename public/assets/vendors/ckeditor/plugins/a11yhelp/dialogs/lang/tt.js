<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

use function assert;
use function count;
use function get_class;
use function sprintf;
use function trim;
use PHPUnit\Util\Filter;
use PHPUnit\Util\InvalidDataSetException;
use PHPUnit\Util\Test as TestUtil;
use ReflectionClass;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class TestBuilder
{
    public function build(ReflectionClass $theClass, string $methodName): Test
    {
        $className = $theClass->getName();

        if (!$theClass->isInstantiable()) {
            return new WarningTestCase(
                sprintf('Cannot instantiate class "%s".', $className)
            );
        }

        $backupSettings = TestUtil::getBackupSettings(
            $className,
            $methodName
        );

        $preserveGlobalState = TestUtil::getPreserveGlobalStateSettings(
            $className,
            $methodName
        );

        $runTestInSeparateProcess = TestUtil::getProcessIsolationSettings(
            $className,
            $methodName
        );

        $runClassInSeparateProcess = TestUtil::getClassProcessIsolationSettings(
            $className,
            $methodName
        );

        $constructor = $theClass->getConstructor();

        if ($constructor === null) {
            throw new Exception('No valid test provided.');
        }

        $parameters = $constructor->getParameters();

        // TestCase() or TestCase($name)
        if (count($parameters) < 2) {
            $test = $this->buildTestWithoutData($className);
        } // TestCase($name, $data)
        else {
            try {
                $data = TestUtil::getProvidedData(
                    $className,
                    $methodName
                );
            } catch (IncompleteTestError $e) {
                $message = sprintf(
                    "Test for %s::%s marked incomplete by data provider\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($e)
                );

                $data = new IncompleteTestCase($className, $methodName, $message);
            } catch (SkippedTestError $e) {
                $message = sprintf(
                    "Test for %s::%s skipped by data provider\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($e)
                );

                $data = new SkippedTestCase($className, $methodName, $message);
            } catch (Throwable $t) {
                $message = sprintf(
                    "The data provider specified for %s::%s is invalid.\n%s",
                    $className,
                    $methodName,
                    $this->throwableToString($t)
                );

                $data = new WarningTestCase($message);
            }

            // Test method with @dataProvider.
            if (isset($data)) {
                $test = $this->buildDataProviderTestSuite(
                    $methodName,
                    $className,
                    $data,
                    $runTestInSeparateProcess,
                    $preserveGlobalState,
                    $runClassInSeparateProcess,
                    $backupSettings
                );
            } else {
                $test = $this->buildTestWithoutData($className);
            }
        }

        if ($test instanceof TestCase) {
            $test->setName($methodName);
            $this->configureTestCase(
                $test,
                $runTestInSeparateProcess,
                $preserveGlobalState,
                $runClassInSeparateProcess,
                $backupSettings
            );
        }

        return $test;
    }

    /** @psalm-param class-string $className */
    private function buildTestWithoutData(string $className)
    {
        return new $className;
    }

    /** @psalm-param class-string $className */
    private function buildDataProviderTestSuite(
        string $methodName,
      