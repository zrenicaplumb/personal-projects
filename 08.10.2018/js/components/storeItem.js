var StoreItem = {
    itemWrap: $('.item-wrap'),
    init:function(storeItem){
        storeItem = Object.assign(Object.create(this), storeItem);
        storeItem.render();
        return storeItem;
    },
    render:function(){
        var element = $('<div class="store-item">'+
                            '<div class="col-xs-12 col-sm-6">'+
                                '<img src="img/'+this.image+'">'+
                            '</div>'+
                        '</div>');
    }
}