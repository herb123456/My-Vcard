Ext.onReady(function(){
var win;
var showDom = Ext.get('suggestion');


if(!win){
win = new Ext.Window({
            title: '建議與Bug回報',
            closable:true,
			resizable : false,
			width:365,
            height:300,
			shadow : true,
			modal : true,
            //border:false,
			plain:true,
			closeAction:'hide',
            layout: 'table',

            items: [suggestion_form]
        });
}

var show_btn = new Ext.Button({
						id: 'show_btn',
						renderTo: 'suggestion',
						text: '建議與Bug回報',
						iconCls:'sugg_btn',
						handler: function(){
							win.show(showDom);
						}
});



		
});