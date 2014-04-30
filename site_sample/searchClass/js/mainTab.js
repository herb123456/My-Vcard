/*
 * Ext JS Library 2.0
 * Copyright(c) 2006-2007, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

Ext.onReady(function(){
	
	
	
	//-----------主要tab------------------------------
    var tabs = new Ext.TabPanel({
		activeTab: 0,
        renderTo:'tabs',
        enableTabScroll:true,
        width:830,
        height:430,
		defaults: {autoScroll:true},
		items:[{
                title: '課程搜尋',
                contentEl:'mainTab'
            }
			]
        //plugins: new Ext.ux.TabCloseMenu()
    });
	//--------------------------------------------------
    
	// tab generation code
    var index = 0;
	//增加一個查詢按鈕-執行searchClass function
	new Ext.Button({
		id: 'bb',
		renderTo:'searchButton',
        text: '查詢',
        handler: searchClass,
        iconCls:'search-btn'
    });
	
	
	//----------searchClass function--------------------
	function searchClass(){
		var yr = semester_form.findById('academic_year').getValue();
		var sem = semester_form.findById('semester').getValue();
		var classCode = semester_form.findById('grade_combo').getValue();
		//----------------------------------------------------------------------------------------------------------------------------------
		var teacherName = teacher_class_form.findById('teacher_textfield').getValue();
		var className = teacher_class_form.findById('class_textfield').getValue();
		//--------------------------------------------------------------------------------------------------------------------------------------
		var roomCode = building_form.findById('classRoom_combo').getValue();
		//var roomCode = classRoom_combo.getValue();
		//alert(roomCode);
        if(yr != "" && sem != ""){
			if(classCode != "" || (teacherName != "" || className != "") || roomCode != ""){
				var newt = tabs.add({
					title: '查詢結果' + (++index),
					id: 'resoult' + index,
					iconCls: 'tabs',
					closable:true
				})
				tabs.setActiveTab(newt);
				newt.body.load({
					scripts:true,
					url: 'resoult.php',
					method:'post',
					params: 'year='+yr+'&semester='+sem+'&code='+classCode+'&tname='+teacherName+'&cname='+className+'&rcode='+roomCode+'&index='+index
				});
			}else{
				Ext.MessageBox.alert('警告','至少選擇一項搜尋條件');
			}
		}else{
			Ext.MessageBox.alert('警告','學年和學期為必填');	
		}
	}
   //---------------------------------------------------
   
   
    
	
	var panel = new Ext.Panel({
                id:'main-panel',
                baseCls:'x-plain',
                renderTo: 'mainPanel',
                layout:'table',
                layoutConfig: {columns:3},
                // applied to child components
                defaults: {frame:true, height: 170,style:"margin:5px;"},
                items:[{
					title:'依據系所搜尋',
                    //width:400,
					height:350,
					contentEl:'form_1',
					rowspan: 2
				},{
					title:'依據名稱搜尋',
                    width:'400',
					contentEl:'form_2',
					colspan: 2	
				},{
					title:'依據大樓搜尋',
                    width:'400',
					contentEl:'form_3'
				}]
            });
	
});