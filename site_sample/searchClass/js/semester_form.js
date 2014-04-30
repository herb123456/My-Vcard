Ext.onReady(function(){
	Ext.QuickTips.init();
	
	
	
	semester_form = new Ext.FormPanel({
		labelWidth: 80, // label settings here cascade unless overridden
        frame:true,
        //title: '課程查詢',
        bodyStyle:'padding:5px 5px 0',
		//width: '100%',
        defaults: {width: 230},
        defaultType: 'textfield',
		
		items: [academic_field,
				semester,
				depcombo,
				facombo,
				ch_fa_combo,
				grade_combo,
				clear_semester_form_element_button
				]
				
	});
	semester_form.render(Ext.get("form_1"));
	
	
});