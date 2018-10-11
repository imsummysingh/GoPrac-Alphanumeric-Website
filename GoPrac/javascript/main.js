$(document).ready(function(){

    function ViewModel(){
        var self=this;
        self.folders=["index","view","edit","delete"];
        self.getFolderData=function(folderName,data)
        {
            switch(folderName)
            {
                case "index":
                return new IndexPageData(self.sort, self.order, self.page, self.filterStartDate, self.filterEndDate, self.CODE);
    
                case "view":
                return data;
    
                case "edit":
                return data;
    
                case "delete":
                return null;
            }
        };

    
        self.selectedFolder = ko.observable("index");
        self.folderData = ko.observable(self.getFolderData(self.selectedFolder()));
        self.redirectFolder=function(folder,data)
        {
            self.selectedFolder(folder);
            self.folderData(self.getFolderData(folder,data));
        };
        
        //edit
        self.update=function()
        {
            var data=self.folderData();
            $.ajax({
                url:'http://localhost/project/update.php',
                type:'post',
                dataType:'json',
                success: function(data){
                    self.redirectFolder("index");
                },
                data:JSON.stringify({id:data.id,code:data.code})
            });
        };

        //delete
        self.delete = function(index, data){
            $.getJSON('http://localhost/project/delete.php?id=' + data.id, function (data) {
                var codes = self.folderData().codes();
                codes.splice(index(), 1);
                self.folderData().codes(codes)
            });
        };

        self.filterStartDate = null;
        self.filterEndDate = null;
        self.order = null;
        self.sort = null;
        self.CODE=null;
        self.page = 1;

        self.applyFilter=function(){
            self.filterEndDate =  self.folderData().filterEndDate;
            self.filterStartDate =  self.folderData().filterStartDate;
            self.order =  self.folderData().order;
            self.sort =  self.folderData().sort;
            self.CODE = self.folderData().CODE;
            self.page = self.folderData().page
            self.folderData(new IndexPageData(self.sort, self.order, self.page, self.filterStartDate, self.filterEndDate,self.CODE))
        };

        self.changePage = function(){
            self.page = this;
            self.folderData(new IndexPageData(self.sort, self.order, self.page, self.filterStartDate, self.filterEndDate,self.CODE))
        }

        
    }

    function arrayOfIntegers(lastInt){
        arr = [];
        for(var i =1; i <= lastInt; i++){
            arr.push(i);
        }
        return arr
    }

    //view
    function IndexPageData(sort, order, page, filterStartDate, filterEndDate, CODE) {
        var self=this;
        self.sort = sort || 'start_date';
        self.order = order || 'desc';
        self.filterStartDate = filterStartDate || null;
        self.filterEndDate = filterEndDate || null;
        self.page = page || 1
        self.CODE = CODE || null;
        self.codes=ko.observableArray();
        self.pageNumberArray=ko.observableArray();
        self.totalPages = 0;
        $.getJSON(`http://localhost/project/view.php?sort=${self.sort}&order=${self.order}&page=${self.page}&start_date=${self.filterStartDate}&end_date=${self.filterEndDate}&code=${self.CODE}`,
        function(data,status){
            var codes = [];
            data.codes.forEach(function(code){
                codes.push(new Code(code.id,code.Codes,code.Start_Date,code.End_Date))
            });
           self.codes(codes);
           self.totalPages = data.total_pages;
           self.pageNumberArray(arrayOfIntegers(self.totalPages));
        });
        self.selectIndex=null;
        self.viewCode=function(index,data)
        {
            self.selectIndex=index;
        }
    }

    function Code(id,code,startDate,endDate)
    {
        this.id=id;
        this.code=code;
        this.startDate=startDate;
        this.endDate=endDate;
    }

    ko.applyBindings(new ViewModel())
    
});
