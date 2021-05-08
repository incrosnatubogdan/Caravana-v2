.navButtonAdd('#grid_pager',{
   caption:"", 
   buttonicon:"ui-icon-refresh", 
   onClickButton: function(){ 
		$("#jqgajax")[0].triggerToolbar();
   }, 
   position:"last"
})
.navButtonAdd('#grid_pager',{
   caption:"Reset filtre", 
   buttonicon:"ui-icon-newwin", 
   onClickButton: function(){ 
   		$("#jqgajax")[0].clearToolbar();
		$("#jqgajax")[0].triggerToolbar();
   }, 
   position:"last"   
   
})
<?php if(0):?>.navButtonAdd('#grid_pager',{
   caption:"Cautare avansata", 
   buttonicon:"ui-icon ui-icon-search", 
   onClickButton: function(){ 
   	jQuery("#jqgajax").jqGrid('searchGrid', {afterShowSearch:resetFilter,multipleSearch:true,overlay:false,sopt:['eq','bw','ne','lt','le','gt']} );
   
   }, 
   position:"last"   
   
})<?php endif; ?>.navButtonAdd('#grid_pager',{
   caption:"Exporta", 
   buttonicon:"ui-icon-newwin", 
   onClickButton: function(){ 
   		
   		var args = new Array();
   		var url;
   		
   		url = $('#jqgajax').getGridParam('url');
   		var data = $('#jqgajax').getGridParam('postData');
   		
		data.rows = 999999;
   		data.csv = 1;
		
   		jQuery.each(data, function(i, val){
            args.push(i + '=' + val);
        });
        
		var ads = args.join('&');
		var url_tst = url.split('?');
		
		if(url_tst.length==1)
		{
        	url=url+'?'+ads;
		}else
		{
        	url=url+'&'+ads;
		}
        
        window.open(url,"download","menubar=0,resizable=0,width=10,height=10"); 
     	data.csv=0;	
   		
   }, 
   position:"last"
})<?php if(0):?>.navButtonAdd('#grid_pager',{
   caption:"Coloane", 
   buttonicon:"ui-icon-eject", 
   onClickButton: function(){ 
		
		  jQuery("#jqgajax").setColumns({'width':'220px','updateAfterCheck':true});
   		return false;
		
   }, 
   position:"last"
})<?php endif; ?>
