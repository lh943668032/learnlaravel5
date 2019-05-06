$(function () {

    //1.初始化Table
    var oTable = new TableInit();
    oTable.Init();

    //2.初始化Button的点击事件
    var oButtonInit = new ButtonInit();
    oButtonInit.Init();

});


var TableInit = function () {
    var $table = $('#mytab')
    // var $remove = $('#remove')
    var selections = []

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        })
    }
    var oTableInit = new Object();
    //初始化Table
    oTableInit.Init = function () {
        $table.bootstrapTable({

            url: 'system/getversions',         //请求后台的URL（*）
            method: 'post',                      //请求方式（*）
            toolbar: '.toolbar',                //工具按钮用哪个容器
            striped: true,                      //是否显示行间隔色
            cache: false,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
            pagination: true,                   //是否显示分页（*）
            sortable: true,                     //是否启用排序
            sortOrder: "asc",                   //排序方式
            queryParams: oTableInit.queryParams,//传递参数（*）
            sidePagination: "client",           //分页方式：client客户端分页，server服务端分页（*）
            pageNumber:1,                       //初始化加载第一页，默认第一页
            pageSize: 10,                       //每页的记录行数（*）
            pageList: [10, 20, 30, 50],        //可供选择的每页的行数（*）
            search: true,                       //是否显示表格搜索，此搜索是客户端搜索，不会进服务端，所以，个人感觉意义不大
            strictSearch: false,
            singleSelect: true,
            showColumns: false,                  //是否显示所有的列
            showRefresh: true,                  //是否显示刷新按钮
            minimumCountColumns: 1,             //最少允许的列数
            clickToSelect: true,                //是否启用点击选中行
            //height: 500,                        //行高，如果没有设置height属性，表格自动根据记录条数觉得表格高度
            uniqueId: "id",                     //每一行的唯一标识，一般为主键列
            showToggle:false,                    //是否显示详细视图和列表视图的切换按钮
            cardView: false,                    //是否显示详细视图
            detailView: false,                   //是否显示父子表
            pagination:true,
            ajaxOptions:{
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            },
            formatLoadingMessage: function () {
                return "请稍等，正在加载中...";
            },
            formatNoMatches: function () {  //没有匹配的结果
                return '无符合条件的记录';
            },
            columns: [{
                checkbox: true
            }, {
                field: 'id',//序列号
                title: '序列号',//用户id
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
            }, {
                field: 'branch',//序列号
                title: '客户名称',//用户id
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
            },{
                field: 'version',//序列号
                title: '版本号',//用户id
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
            },{
                field: 'created_at',//序列号
                title: '创建时间',//用户id
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
            },{
                field: 'updated_at',//序列号
                title: '更新时间',//用户id
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
            },{
                file:'operate',
                title:'操作',
                align: 'center', // 左右居中
                valign: 'middle', // 上下居中
                events: window.operateEvents,
                formatter:actionFormatter,
            }]
        },'refresh');
    };

    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            // alert('You click like action, row: ' + JSON.stringify(row))
            window.open('systems/'+row.id+'/edit','_self');
        },
        // 'click .remove': function (e, value, row, index) {
        //     $table.bootstrapTable('remove', {
        //         field: 'id',
        //         values: [row.id]
        //     })
        // }
    }

    //操作栏的格式化
    function actionFormatter(value) {
        var id = value;
        var result = "";
        result += "<a href='javascript:;' class='edit btn btn-xs blue' title='编辑'><span class='glyphicon glyphicon-pencil'></span></a>";
        // result += "<a href='javascript:;' class='remove btn btn-xs red' title='删除'><span class='glyphicon glyphicon-remove'></span></a>";
        return result;
    }
    //得到查询的参数
    oTableInit.queryParams = function (params) {
        var temp = {   //这里的键的名字和控制器的变量名必须一直，这边改动，控制器也需要改成一样的
            // _token: '.csrf_token().'
            // limit: params.limit,   //页面大小
            // offset: params.offset,  //页码
            // _token:csrf_field(),
            // pageList:params.pageList,
            // departmentname: $("#txt_search_departmentname").val(),
            // statu: $("#txt_search_statu").val(),
        };
        return temp;
    };
    return oTableInit;
};


var ButtonInit = function () {
    var oInit = new Object();
    var postdata = {};

    oInit.Init = function () {
        //初始化页面上面的按钮事件
    };

    return oInit;
};
