
        let arr=[1,2,3,4,5];
        var x= arr.length;
        function productOfArray(arr,x){
           if(x<=0){
           return arr[x];
          }
        return arr[x-1]*productOfArray(arr,x-1);
       }
       console.log(productOfArray(arr,x));
