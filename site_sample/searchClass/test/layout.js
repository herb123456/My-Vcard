/*
 * Ext JS Library 2.0
 * Copyright(c) 2006-2007, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */


    
   /*Ext.state.Manager.setProvider(
            new Ext.state.SessionProvider({state: Ext.appState}));
*/
	
    function show(){
		Ext.Ajax.request({
   			url: 'timetable.php',
   			success: function(resoult){
						var table = resoult.responseText;	
						show_window(table);
					},
   			//failure: otherFn,
   			params: { place: '1,5,勵志2-107,1,6,勵志2-107' }
		});
	}
	function show_window(table){
		
		 content = Ext.get('test');
		
		if(newEl){
			newEl.remove();	
		}
		
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
            title: 'Layout Window',
            closable:true,
			width:220,
            height:300,
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
