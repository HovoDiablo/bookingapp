/**
 * @author Emil Hakobian
 */

function showHideLoading(obj,show) {
    if (obj == undefined) {
        obj = "progressBar";
    }

    switch (show) {
        case true:
            $("#"+obj).show();
        break;
        case false:
            $("#"+obj).hide();
        break;
    }
}

var checkInOut = function (checkInField,checkOutField) {
    var checkInObj = $(checkInField);
    var checkOutObj = $(checkOutField);

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = checkInObj.datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate',function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        checkOutObj[0].focus();
    }).data('datepicker');

    var checkout = checkOutObj.datepicker({
      onRender: function(date) {
      var $rs;
        if (date.valueOf() < checkin.date.valueOf()) {
            return  'disabled';
        }else if (date.valueOf() == checkin.date.valueOf()) {
            return  'disabled active';
        }else  {
            return '';
        }
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
};


var roomLive = function () {

    obj = {
        roomObj: $('#RoomOptions_roomNumbers'),
        adultsObj: $('.RoomOptions_adults'),
        childsObj: $('.RoomOptions_childs'),
        createSelectList:function(listname,startValue,listLength,selected,htmlclass) {
            var htmlStr = '';
            htmlStr += '  <select name="'+listname+'" id="'+listname+'" class="'+htmlclass+'">';

            for (var i=startValue; i <= listLength; i++) {
                if (i == selected) {
                    htmlStr += '<option value="'+i+'" selected>'+i+'</option>';
                }else {
                    htmlStr += '<option value="'+i+'">'+i+'</option>';
                }

            };

            htmlStr += '</select> ';
            return htmlStr;
        },
        getLastRoom: function() {
            var lastroom = $('.RoomOptions_roomObj').length;
            return lastroom;

        },
        getLastChild: function() {
            var lastChild = $('.RoomOptions_roomObj').length;
            return lastChild;
        },
        adRoom: function (roomQuant,lastRoom) {
            var htmlStr = '';

            if (roomQuant > lastRoom) {
                for (var i=lastRoom+1; i <= roomQuant; i++) {

                    htmlStr += '<div class="form-group RoomOptions_roomObj" id="room'+i+'"> <label class="control-label">Adults</label>';
                    htmlStr += this.createSelectList('room'+(i)+'_adults',1,14,2,'RoomOptions_adults');

                    htmlStr += '<label class="control-label">Childrens</label>';
                    htmlStr += this.createSelectList('room'+(i)+'_childs',0,6,0,'RoomOptions_childs');
                    htmlStr += '</div>';

                };

                $(htmlStr).insertAfter('.RoomOptions_roomObj:eq('+(lastRoom-1)+')');

            }else if (roomQuant < lastRoom) {
                for (var j=lastRoom ;j >= parseInt(roomQuant+1); j--) {
                    $('.RoomOptions_roomObj:eq('+(j-1)+')').remove();
                };

            }

            //roomLive();
        },
        addChildsAgesFields: function(childsQuant,lastChild) {
            htmlStr = "";
            if (childsQuant>lastChild) {
                for (var i=lastChild+1; i <= childsQuant; i++) {

                };
            }

            return htmlStr;
        },
        roomChange:function() {
            this.roomObj.on("change",function() {
                var roomQuant = parseInt($(this).val());
                var lastRoom = obj.getLastRoom();
                obj.addRoom(roomQuant,lastRoom);

            });
        },
        addultsChange: function() {
            this.childsObj.on("change",function(){
                var childsQuant = $(this).val();
                obj.addChildsAgesFields(childsQuant);
            });
        }
    };

    obj.roomChange();
    obj.addultsChange();


};

