function myParse(str){
    var i = 0, k=0, username;
    while(i < str.length){
        if(str[i] == "@"){
            k=0;
            for(j=i+1 ; j < str.length ; j++){
                k++;
                if(str[j] == " "){
                    username = str.substr( i+1, k-1);
                    break;
                }
            }
            str =  str.substr( 0, i) + "<a class='tag-name' style='font-weight: bold; color: #0a0909 ' href='/user/" + username +  "'>" + username + "</a>" + str.substr( i+k, str.length);

        }
        i++;
    }
    return str;
}
