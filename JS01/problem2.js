let i;
for(i=1;i<=100;i++){
    if((i%3==0) && (i%5==0)){
        console.log(i+" OpenSense");
    }
    else if(i%5==0){
        console.log(i+" Sense"); 
    }  
    else if(i%3==0){
        console.log(i+" Open");
    }
    else{
        console.log(i);
    }
}