var StoreItem = {
    itemWrap: $('.item-wrap'),
    init:function(storeItem){
        storeItem = Object.assign(Object.create(this), storeItem);
        storeItem.render();
        return storeItem;
    },
    render:function(){
        var element = $('<div class="col-xs-12 col-sm-4 col-md-3">'+
                            '<div>'+
                                "Name: "+this.title+"<br/>"+
                                
                                '<img class="gallery-img" src=img/'+this.image+'>'+
                                '<p>'+this.price+'</p>'+
                            '</div>'+
                            '<button class="deleteStoreItem">Delete</button>'+
                        '</div>');
    
        if(this.element){
            this.element = element.replaceAll(this.element);
        }
        else{
            this.element = element.appendTo(this.itemWrap);
        }
        this.listeners();
    },
    listeners:function(){
        var storeItem = this;

        this.element.find('img').on('click', function(){
            storeItem.showForm();
        });

        this.element.find('input[name="title"]').on('change', function(){
            var title = $(this).val();
            storeItem.update({title:title});
        });

        this.element.find('.deleteStoreItem').on('click',function(){
            storeItem.delete();
        });
    },
    delete:function(){
        var storeItem = this;
        $.ajax({
            url: 'api.php',
            data: {method: 'deleteStoreItem', id: this.id},
            dataType: 'json',
            success:function(result){
                console.log(result);
                storeItem.element.remove();
            },
        });
    }
    // showForm:function(){
    //     var storeItemForm = $('.storeItemForm');
    //     storeItemForm.show();
    // },
    
    // update:function(){
    //     var storeItem = this;
    //     Object.assign(storeItem, settings);
    //     $.ajax({
    //         url: 'api.php',
    //         data: {method: 'updateStoreItem', id: this.id, settings: settings},
    //         dataType: 'json',
    //         success:function(result){
    //             console.log(result);
    //             storeItem.render();
    //         },
    //     });
    // },
    // showDetails:function(){
    //     var storeItem = this;
    //     var detailsElement = "";
    //     var properties = ['id','title','price','image'];
    //     properties.forEach(function(prop){
    //         detailsElement+=(prop+":"+storeItem[prop]);
    //     });
    //     alert(detailsElement);
    // }
}