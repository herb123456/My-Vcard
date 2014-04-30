Ext.onReady(function(){
	Ext.QuickTips.init();
	
	
	
	teacher_class_form = new Ext.FormPanel({
		labelWidth: 80, // label settings here cascade unless overridden
        frame:true,
        //title: '課程查詢',
        bodyStyle:'padding:5px 5px 0',
		width: '100%',
        defaults: {width: 230},
        defaultType: 'textfield',
		
		
		items: [teacher_textfield,
				class_textfield,
				clear_teacher_form_element_button
				]
	});
	teacher_class_form.render(Ext.get("form_2"));
	
	
});