index = 1;
function where_place(value){
	Ext.Ajax.request({
   			url: 'timetable.php',
   			success: function(resoult){
						var table = resoult.responseText;	
						show_window(table);
					},
   			//failure: otherFn,
   			params: { place: value }
		});
	}
	function show_window(table){
		
		content = Ext.getBody();
		newEl = 'NULL';
		
		var newEl = content.createChild({tag:'div'});
		newEl.update(table,true);

		var button = Ext.get('show-btn');
        // tabs for the center
        var tabs = new Ext.TabPanel({
            region: 'center',
            activeTab: 0,
            defaults:{autoScroll:true},
			contentEl: newEl
        });

        

        var win = new Ext.Window({
            title: '上課地點',
            closable:true,
			width:600,
            height:500,
            //border:false,
			plain:true,
            layout: 'border',

            items: [tabs]
        });

        win.show(button);
		win.on("hide",function h(){
						newEl.remove();
					});
		
    }