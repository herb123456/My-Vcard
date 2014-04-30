Ext.onReady(function(){
	Ext.QuickTips.init();
	
	
	
	building_form = new Ext.FormPanel({
		labelWidth: 80, // label settings here cascade unless overridden
        frame:true,
        //title: '課程查詢',
        bodyStyle:'padding:5px 5px 0',
		cls : 'cellpadding: 10px',
        width: '100%',
        defaults: {width: 230},
        defaultType: 'textfield',
		
		
		items: [building_combo,
				classRoom_combo,
				clear_building_form_element_button]
	});
	building_form.render(Ext.get("form_3"));
	
	
});