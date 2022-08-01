var car = {
    name: "Audi",
    color: "Black",
model: "RS7" 
} 

for([key,value] of Object.entries(car)){
    console.log(key,"=",value);
}