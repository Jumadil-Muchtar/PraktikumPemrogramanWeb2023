function sortNumbers(nums){
   let n = nums.length

   for (let i = 0; i < n-1; i++) {
      for (let j = 0; j < n-i-1; j++) {
         if (nums[j] > nums[j+1]) {
            let temp = nums[j];
            nums[j] = nums[j + 1];
            nums[j + 1] = temp;
         }
      }      
   }
}

var n = 5
var array = [50, 20, 1, 45, 3]

sortNumbers(array)
console.log(array)