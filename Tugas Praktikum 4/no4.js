function bubbleSort(arr) {
    if (n == arr.length){
        for (let i = 0; i < n - 1; i++) {
            console.log(i);
            for (let j = 0; j < n - i - 1; j++) {
                if (arr[j] > arr[j + 1]) {
                    let temp = arr[j];
                    arr[j] = arr[j + 1];
                    arr[j + 1] = temp;
                }
            }
        }
    } else {
        console.log("Nilai n harus sama dengan jumlah dalam array");
    }
}

let n = 5;
let numbers = [50, 20, 1, 45, 3];
console.log("Sebelum diurutkan:", numbers);
bubbleSort(numbers);
console.log("Setelah diurutkan:", numbers);
