var page_num = 0;
function dp_prev(){
    page_num == 0 ? page_num = 0 : page_num -= 1;
    var dp_page = document.getElementsByClassName('dp-page');
    for(let i=0; i<4; i++){
        if(i==page_num || i==(page_num+1))   
            dp_page[i].style.display = "inline-block"; 
        else                                            
            dp_page[i].style.display = "none";
    }
};
function dp_next(){
    page_num == 2 ? (page_num = 2) : (page_num += 1);
    var dp_page = document.getElementsByClassName('dp-page');    
    for(let i=0; i<4; i++){
        if(i==page_num || i==(page_num+1))  
            dp_page[i].style.display = "inline-block";
        else
            dp_page[i].style.display = "none"; 
    }
};