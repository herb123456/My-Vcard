Ext.onReady(function(){
	
	teacher_textfield = new Ext.form.TextField({
									 name :'teacher_textfield',
									 id : 'teacher_textfield',
									 fieldLabel : '授課教師姓名',
									 maxLength : 15,
									 maxLengthText : '這老師名子也太長了吧^^'
			});
	class_textfield = new Ext.form.TextField({
									 name :'class_textfield',
									 id : 'class_textfield',
									 fieldLabel : '完整課程名稱',
									 maxLength : 15,
									 maxLengthText : '這課程名稱也太長了吧^^'
			});
			
	clear_teacher_form_element_button = new Ext.Button({
												id: 'clear_teacher_form_element_button',
												text: '清除',
												iconCls:'clear_tea_btn',
												handler: clear_tea_f_el
	});
	
	function clear_tea_f_el(){
		teacher_textfield.setValue("");
		class_textfield.setValue("");
	}
					 
});