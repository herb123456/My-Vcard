<script language="javascript">
Ext.onReady(function(){
	Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
	// create the Data Store
    var ds = new Ext.data.Store({
        // load using script tags for cross domain, if the data in on the same domain as
        // this page, an HttpProxy would be better
        proxy: new Ext.data.ScriptTagProxy({
            url: 'search_resoult.php'
        }),

        baseParams: {aca_v:'<?=$_POST[year]?>',
					 sem_v:'<?=$_POST[semester]?>',
					 cl_code:'<?=$_POST[code]?>',
					 tea_name:'<?=$_POST[tname]?>',
					 cl_name:'<?=$_POST[cname]?>',
					 rm_code:'<?=$_POST[rcode]?>'},
       
        // create reader that reads the Topic records
        reader: new Ext.data.JsonReader({
            root: 'data',
            totalProperty: 'totalCount',
            id: 'class_id'
        }, [
              {name: 'YR'},
              {name: 'SEM'},
              {name: 'CSDATANAME'},
              {name: 'SITESEAT', type:'int'},
              {name: 'TAKESEAT', type:'int'},
			  {name: 'DEPNAME'},
			  {name: 'TEACHERNAME'},
			  {name: 'class_place'}
        ]),

        // turn off remote sorting for local sorting
        remoteSort: false
    });
    //ds.setDefaultSort('wid', 'ASC');
    
    
   
     //Ext.util.JSON.encode
	function place(val){
		//var decode_value = Ext.util.JSON.decode(val);
		var return_text = '<input type="button" style="font-size:12px;background-color:#FFFFFF;border:1px dotted #005F9F" value="查詢地點" onClick="where_place(';
		return_text += "'";
		return_text += val;
		return_text += "'";
		return_text += ')">';
		
        return return_text;
    }
	
    
    // the column model has information about grid columns
    // dataIndex maps the column to the specific data field in
    // the data store
    var cm = new Ext.grid.ColumnModel([/*{
         //id: 'topic', // id assigned so we can apply custom css (e.g. .x-grid-col-topic b { color:#333 })
           header: "id",
           dataIndex: 'class_id',
           hidden: true

           //renderer: renderTopic,
           //css: 'white-space:normal;'
        },*/{
           header: "可選人數",
           dataIndex: 'SITESEAT',
		   sortable: true,
		   width: 50
		       //renderer:Ext.util.Format.dateRenderer('Y-m-d')
           //hidden: true
        },{
           header: "已選人數",
           dataIndex: 'TAKESEAT',
		   sortable: true,
           width: 50
           //renderer: renderLast
        },{
           header: "課程名稱",
           dataIndex: 'CSDATANAME',
		   sortable: true,
           width: 120
           //hidden: true
        },{
           header: "所屬系別",
           dataIndex: 'DEPNAME',
		   sortable: true,
		   width: 120
           //hidden: true
        },{
           header: "授課教師",
           dataIndex: 'TEACHERNAME',
		   sortable: true,
		   width: 120
           //hidden: true
        },{
           header: "在哪上課",
           dataIndex: 'class_place',
		   sortable: true,
		   renderer: place,
		   width: 120
        }]);


    var grid = new Ext.grid.GridPanel({
        id:'search_grid<?=$_POST[index]?>',
       // el:'topic-grid',
        width: 700,
        height:380,
        //title:'搜尋結果',
        //region:'center',
       // split:'true',
        store: ds,
        cm: cm,
        trackMouseOver:false,
        sm: new Ext.grid.RowSelectionModel({singleSelect:true}),
        loadMask: true,
		frame: true,
		stripeRows: true,
		//hideBorders: true,
		//hideCollapseTool: true,
        viewConfig: {
			emptyText :'查無資料',
            forceFit:true
        },
		
		bbar: new Ext.PagingToolbar({
			id : 'bbar<?=$_POST[index]?>',
            pageSize: 12,
            store: ds,
            displayInfo: true,
            displayMsg: 'Displaying topics {0} - {1} of {2}',
            emptyMsg: "No topics to display"
            
        })
		
    });
	grid.render(Ext.get('resoult_grid<?=$_POST[index]?>'));
	
	// trigger the data store load
    ds.load();
	//{params:{start:0, limit:12}}
	ds.on('load', function() {
		var el = grid.getGridEl();
		if (ds.getTotalCount() == 0 && typeof el == 'object') {
			el.mask('查無資料', 'x-mask');
		}
	});
});
</script>
<script type="text/javascript" src="./js/class_place.js"></script>
<div id="resoult_grid<?=$_POST[index]?>"></div>
<div id="place"></div>