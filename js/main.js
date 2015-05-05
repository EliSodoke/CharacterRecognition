//Will redirect to the same page, but passing a letter as argument to filter list
function filterLetter(letter) {
    location.href = "/CharacterRecognition/Letters/index/" + letter;
}

$(document).ready(function() {
   
    /************************************
    *  Drawing a letter on a grid 
    ***********************************/
    var mouseDown = false;
    var mouseButton = 0;

    $(".drawLetterGrid").mousedown(function(e) {
        mouseDown = true;
        mouseButton = e.which;
        //$(this).css("background-color", "black");
    }).bind("mouseup", function() {
        mouseDown = false;
    });

    $(".drawLetterGrid").mousemove(function(e) {
       if(mouseDown) {
           if(mouseButton === 1) {
               $(this).css("background-color", "black");
           }
       }
    });

    $(".drawLetterGrid").click(function(){
        if($(this).css("background-color") == "rgb(0, 0, 0)") {
            $(this).css("background-color", "white");
        } else {
            $(this).css("background-color", "black");
        }
    });

    //Storing the letter drawn to database
    $("#drawLetterForm").submit(function() {
        var pixelString = "";
        $(".drawLetter").children().children().each(function() {
            $(this).children().each(function() {
                if($(this).css("background-color") == "rgb(0, 0, 0)") {
                    pixelString += "1 ";
                } else {
                    pixelString += "0 ";
                }
            });
        });
        pixelString = pixelString.trim();
        
        $.ajax({
            type: "POST",
            url: "/CharacterRecognition/Letters/storeDrawnLetter",
            data: "pixel=" + pixelString,
            success: function(data) {
                if(data == "yes") {
                    $(".message").html("Storing successful");
                } else {
                    $(".message").html(data);
                }
            }
        });
        return false;
    });
});


