Ext.onReady(function(){
Ext.QuickTips.init();

//-----------------類型combobox選項--------------------
Ext.namespace('suggCombo', 'suggCombo.sugg');
 
suggCombo.sugg = [
	['1', '建議'],
	['2', 'Bug回報']
];
//-----------------------------------------------------
//---------------------------類型combobox---------------------------------------------
sugg = new Ext.form.ComboBox({
				name: 'sugg',
				id: 'sugg',
				fieldLabel:'回報類型',
                displayField:'suggname',
                valueField:'suggid',
				hiddenName:'suggid',
				emptyText:'請選擇什麼類型...',
                store: new Ext.data.SimpleStore({
                    fields:['suggid', 'suggname'],
                    data:suggCombo.sugg
                }),
                triggerAction:'all',
				allowBlank:false,
				blankText: '請選擇類型',
				readOnly: true,
				editable: false,
				value: '1',
				mode:'local'
			});
//---------------------------------------------------------------------------------

sugg_content = new Ext.form.TextArea({
				name: 'sugg_content',
				id: 'sugg_content',
				fieldLabel : '建議或Bug內容',
				allowBlank : false,
				blankText : '內容為必填',
				height : 100,
				minLength : 2,
				minLengthText : '字數好像太少摟^^'
});

suggestion_form = new Ext.FormPanel({
		id : 'suggestion_form',
        labelWidth: 90, // label settings here cascade unless overridden
        url:'mail_suggestion.php',
        frame:true,
        bodyStyle:'padding:5px 5px 0',
        width: 350,
        defaults: {width: 230},
        defaultType: 'textfield',

        items: [{
                fieldLabel: '姓名',
                name: 'name',
                allowBlank:false
            },{
                fieldLabel: '系別',
                name: 'depa'
            },sugg,{
                fieldLabel: '標題',
                name: 'title'
            },sugg_content
		],

        buttons: [{
			handler: function(){
					if(suggestion_form.getForm().isValid()){
						Ext.MessageBox.confirm('確認', '確定要送出嗎?', function(btn){
																		if(btn == 'yes'){
																			submitForm();
																		}
																	});
					}else{
						Ext.MessageBox.alert('警告', '請填寫完整');
					}
			},
            text: '送出'
        }]
    });

function submitForm(win){
	form = suggestion_form.getForm();
	form.submit({
		waitMsg:'Please Wait...',
		reset:true,
		success : function(){
			Ext.MessageBox.alert('信息', '發送成功');
		},
		failure : function(form, action){
			Ext.MessageBox.hide();
			Ext.MessageBox.alert('信息', action.result.msg);
		}
	});
}

});