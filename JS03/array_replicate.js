
        let arr=[];
        function replicate(n,x){
            if(n<=0){
            return arr;
            }

            arr.push(x);
            return replicate(n-1,x)
        }

console.log(replicate(4,5));
