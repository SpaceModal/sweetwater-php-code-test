

    function getComments(){
        var request = new XMLHttpRequest();

        request.open('GET', 'http://swdev.com/api/getcomments', true);

        request.onload = function () {
            var data = JSON.parse(this.response);
            document.getElementById("candy-comments").innerHTML = parseCommentData(data.candy);
            document.getElementById("call-comments").innerHTML = parseCommentData(data.call);
            document.getElementById("referral-comments").innerHTML = parseCommentData(data.referral);
            document.getElementById("signature-comments").innerHTML = parseCommentData(data.signature);
            document.getElementById("misc-comments").innerHTML = parseCommentData(data.misc);
        }

        request.send();
    }

    function parseCommentData(commentData){
        var commentSection = "<div>";
        for(var i = 0; i < commentData.length; i++){
            commentSection += "<div class='comment'>";
            commentSection += "<span>"+commentData[i].comments+"</span>";
            commentSection += "</div>";
        }

        commentSection += "</div>";

        return commentSection;


    }




getComments();
