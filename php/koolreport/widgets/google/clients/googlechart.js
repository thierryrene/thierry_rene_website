if(typeof googleChartLoader === "undefined")
{
    function GoogleChart(chartType,chartId,data,options)
    {
        this.chartType = chartType;
        this.chartId = chartId;
        this.data = data;
        this.options = options;
        this.events = {};
        googleChartLoader.callback(function(){
            google.charts.setOnLoadCallback(this.init.bind(this));
            window.addEventListener('resize',this.draw.bind(this));    
        }.bind(this));
    }

    GoogleChart.prototype = {
        options:null,
        dataTable:null,
        chartId:null,
        chartType:null,
        events:null,
        chart:null,
        data:null,
        pointerOnHover:false,
        init:function()
        {
            this.chart = new google.visualization[this.chartType](document.getElementById(this.chartId));
            
            google.visualization.events.addListener(this.chart, 'select', function(){
                var selection = this.chart.getSelection();
                for (var i = 0; i < selection.length; i++)
                {
                    var item = selection[i];
                    if(item.row!=null)
                    {
                        var selectedRow = [];
                        var numColumns = this.dataTable.getNumberOfColumns();
                        for(var i=0;i<numColumns;i++)
                        {
                            selectedRow.push(this.dataTable.getValue(item.row,i));
                        }
                    }

                    if (item.row != null && item.column != null)
                    {
                        this.fireEvent("itemSelect",{
                            "selectedRowIndex":item.row,
                            "selectedColumnIndex":item.column,
                            "selectedValue":this.dataTable.getValue(item.row,item.column),
                            "selectedRow":selectedRow,
                            "columnName":this.dataTable.getColumnLabel(item.column),
                            "table":this.dataTable,
                        });
                    }
                    else if(item.row !=null)
                    {
                        this.fireEvent("rowSelect",{
                            selectedRow:selectedRow,
                            table:this.dataTable,
                            selectedRowIndex:item.row,
                        });
                    }
                    else if(item.column!=null)
                    {
                        this.fireEvent("columnSelect",{
                            selectedColumnIndex:item.column,
                            table:this.dataTable,
                            columnName:this.dataTable.getColumnLabel(item.column),
                        });
                    }
                    this.fireEvent("select",{
                        selectedRowIndex:item.row,
                        selectedColumnIndex:item.column,
                        table:this.dataTable,
                    });
                }
            }.bind(this));
            if(this.pointerOnHover)
            {
                this.addPointerCss();
            }
            this.draw();
        },
        addPointerCss:function()
        {
            google.visualization.events.addListener(this.chart, 'onmouseover', function(){
                $("#"+this.chartId).css('cursor','pointer');
            }.bind(this));
            google.visualization.events.addListener(this.chart, 'onmouseout', function(){
                $("#"+this.chartId).css('cursor','default');
            }.bind(this));
        },
        draw:function()
        {
            this.dataTable = new google.visualization.arrayToDataTable(this.data);
            this.chart.draw(this.dataTable,this.options);
        },
        redraw:function()
        {
            this.draw();
        },
        registerEvent:function(name,handler)
        {
            if(typeof this.events[name]=='undefined')
            {
                this.events[name] = [];
            }
            this.events[name].push(handler);
        },
        fireEvent:function(name,params)
        {
            if(typeof this.events[name]!='undefined')
            {
                for(var i in this.events[name])
                {
                    this.events[name][i](params);
                }
            }
        }
    };
    var googleChartLoader = {
        funcs: new Array(),
        loading:false,
        load:function(stability,package)
        {
            if(typeof google !="undefined")
            {
                google.charts.load(stability, {'packages':[package]});
            }
            else
            {
                if(this.loading == false)
                {
                    $.getScript('https://www.gstatic.com/charts/loader.js',function(){
                        google.charts.load(stability, {'packages':[package]});
                        for(var i in this.funcs)
                        {
                            this.funcs[i]();
                        }
                        this.funcs = new Array();
                    }.bind(this));
                    this.loading = true;
                }    
            }
        },
        callback:function(func)
        {
            if(typeof google == "undefined")
            {
                this.funcs.push(func);
            }
            else
            {
                func();
            }
        }
    };
}