<?php
use Illuminate\Support\Facades\Auth;
  
function page_permission($page){
    $page_permission = Auth::user()->sub_admin_permission()->pluck('page_id')->toArray();
    return is_int(array_search($page, $page_permission));
}
   
function page_access_permission($page,$access){
    $page_permission = Auth::user()->sub_admin_permission()->pluck('page_id')->toArray();
    if(is_int(array_search($page, $page_permission)) == true){
    	if($access == 1){
			$access_permission = Auth::user()->sub_admin_permission()->where('page_id',$page)->pluck('add')->toArray();
    	}
    	if($access == 2){
			$access_permission = Auth::user()->sub_admin_permission()->where('page_id',$page)->pluck('edit')->toArray();
    	}
    	if($access == 3){
			$access_permission = Auth::user()->sub_admin_permission()->where('page_id',$page)->pluck('delete')->toArray();
    	}
    	if($access_permission[0] == 0){
    		return 0;
    	}
    	if($access_permission[0] == 1){
    		return 1;
    	}
    }else{
    	return 0;
    }
}