#include <iostream>
#include <math.h>
#include <stdlib.h>
#include <iomanip>
#include <time.h>
#include <fstream>
#include <ctime>
using namespace std;

class medianAlgorithm{
    public:
    int partition(int numbers[], int lowPos, int highPos) {
        int pivotVal = numbers[lowPos];
        int pivotLoc = lowPos;
        int temp;

        for(int i = lowPos + 1; i <= highPos; i++) {
            if(numbers[i] < pivotVal) {
                pivotLoc++;
                //swap around pivot
                temp = numbers[pivotLoc];
                numbers[pivotLoc] = numbers[i];
                numbers[i] = temp;
            }
        }

        temp = numbers[lowPos];
        numbers[lowPos] = numbers[pivotLoc];
        numbers[pivotLoc] = temp;

        return pivotLoc;
    }




    int select(int numbers[], int lowPos, int midPos, int highPos) {
        int position;

        position = partition(numbers, lowPos, highPos);
        if(position == midPos) {
            return  numbers[midPos];
        }
        if(position > midPos) {
            return select(numbers, lowPos, midPos, position - 1);
        }
        if(position < midPos) {
            return select(numbers, position + 1, midPos, highPos);
        }
    }

    int median(int numbers[], int size) {
        int midPos = floor(size/2);

        if(size == 1) {
            return numbers[0];
        }
        else {
            select(numbers, 0, midPos, size - 1);
        }
    }


    //basicOperation implemented
    int partitionBasic(int numbers[], int lowPos, int highPos,long long *basicOperationMedian) {
        int pivotVal = numbers[lowPos];
        int pivotLoc = lowPos;
        int temp;

        for(int i = lowPos + 1; i <= highPos; i++) {
            *basicOperationMedian = *basicOperationMedian+1;

            if(numbers[i] < pivotVal) {
                pivotLoc++;
                //swap around pivot
                temp = numbers[pivotLoc];
                numbers[pivotLoc] = numbers[i];
                numbers[i] = temp;
            }
        }
        temp = numbers[lowPos];
        numbers[lowPos] = numbers[pivotLoc];
        numbers[pivotLoc] = temp;

        return pivotLoc;
    }




    int selectBasic(int numbers[], int lowPos, int midPos, int highPos,long long *basicOperationMedian) {
        int position;

        position = partitionBasic(numbers, lowPos, highPos,basicOperationMedian);
        if(position == midPos) {
            return  numbers[midPos];
        }
        if(position > midPos) {
            return selectBasic(numbers, lowPos, midPos, position - 1,basicOperationMedian);
        }
        if(position < midPos) {
            return selectBasic(numbers, position + 1, midPos, highPos,basicOperationMedian);
        }
    }

    int medianBasic(int numbers[], int size,long long *basicOperationMedian) {
        int midPos = floor(size/2);

        if(size == 1) {
            return numbers[0];
        }
        else {
            selectBasic(numbers, 0, midPos, size - 1,basicOperationMedian);
        }
    }

};

//BruteForce Below
class bruteForceAlgorithm{
    public:
    int bruteForceMedian(int array[],int n, long long *basicOperation){

        int k = ceil(n/2.0);

        for(int i = 0; i < n;i++){
            int numSmaller = 0;
            int numEqual = 0;

            for(int j = 0; j < n; j++){
                *basicOperation = *basicOperation +1;
                if (array[j] < array[i]){

                    numSmaller++;

                }
                else if (array[j] == array[i]){
                    numEqual++;

                }
            }

            if ((numSmaller < k) && (k <=(numSmaller + numEqual))){
                return array[i];
            }

        }


    }

    int bruteForceMedian(int array[],int n){

        int k = ceil(n/2.0);

        for(int i = 0; i < n;i++){
            int numSmaller = 0;
            int numEqual = 0;

            for(int j = 0; j < n; j++){
                if (array[j] < array[i]){
                    numSmaller++;

                }
                else if (array[j] == array[i]){
                    numEqual++;

                }
            }

            if ((numSmaller < k) && (k <=(numSmaller + numEqual))){
                return array[i];
            }

        }


    }
};
/*
    Precondition: needs intialised array of medians

    prints array of medians to console for testing.


*/
void functionalTesting(int median[],int numTests){

    for(int i = 0; i < numTests; i++){
        cout<<"The median for "<<"test"<<i+1<<" is " <<median[i]<<endl;

    }

}


void generateData(int array[],int size){


    for(int i=0; i <size; i++){
        array[i]=rand() % 1000;

    }


}

void testTime(int array[],ofstream &file,ofstream &file2,bruteForceAlgorithm bruteForce,medianAlgorithm median){
double totalBrute,totalMedian = 0;
int incrementInputSize =1;
double elapsed_secs;
    for (int i=1; i < 1001; i++){
        incrementInputSize++;
        totalBrute = 0;
        totalMedian = 0;
        if(i%100==0){
            cout<<"You are on iteration: "<<i<<endl;
        }
        for(int j =1; j< 100; j++){
            //bruteForce
            generateData(array,incrementInputSize);
            clock_t beginBrute = clock();
            bruteForce.bruteForceMedian(array,incrementInputSize);
            clock_t endBrute = clock();
            elapsed_secs = double(endBrute - beginBrute) / CLOCKS_PER_SEC *1000;
            totalBrute += elapsed_secs;
            //median
            clock_t beginMedian = clock();
            median.median(array, incrementInputSize);
            clock_t endMedian = clock();
            elapsed_secs = double(endMedian - beginMedian) / CLOCKS_PER_SEC *1000;
            totalMedian += elapsed_secs;
        }

        cout<<"totalBrute = "<<totalBrute<<endl;
        cout<<"totalMedian = "<<totalMedian<<endl;

        //output elapsed secs
        file<<incrementInputSize<<","<<totalBrute/100<<endl;
        file<<"\n"<<endl;

        file2<<incrementInputSize<<","<<totalMedian/100<<endl;
        file2<<"\n"<<endl;



    }



}

int testNumberOfOperations(int array[],long long * basicOperation, long long * basicOperationMedian,
                           ofstream &file,ofstream &file2,bruteForceAlgorithm bruteForce,medianAlgorithm median){

    int incrementInputSize =1;

    for(int i =1; i< 1001; i++){
            *basicOperation = 0;
            *basicOperationMedian = 0;
            incrementInputSize++;

        for(int j=0; j < 100; j++){
            generateData(array,incrementInputSize);
            bruteForce.bruteForceMedian(array,incrementInputSize,basicOperation);
            median.medianBasic(array,incrementInputSize,basicOperationMedian);

        }

        file<<incrementInputSize<<","<<*basicOperation/1000<<endl;
        file2<<incrementInputSize<<","<<*basicOperationMedian/1000<<endl;
        file<<"\n"<<endl;
        file2<<"\n"<<endl;


    }

}

int main(){

    //functional testing
    //more tests needed
    int test1[9]=  {4, 1, 10, 9, 7, 12, 8, 2, 15};//
    int test2[9] = {1,2,3,4,5,6,7,8,9};
    int test3[9] = {9,8,7,6,5,4,3,2,1};
    int test4[8] = {4,1,10,9,7,12,8,2};
    int test5[9] = {1,1,1,1,4,3,3,3,9};
    int test6[9] = {-1,-2,-3,3,4,5,6,3,1};

    bruteForceAlgorithm bruteForce;
    medianAlgorithm median;
    //Create array of medians
    int median1,median2,median3,median4,median5,median6;

    median1  = bruteForce.bruteForceMedian(test1,9);
    median2 = bruteForce.bruteForceMedian(test2,9);
    median3 = bruteForce.bruteForceMedian(test3,9);
    median4 = bruteForce.bruteForceMedian(test4,8);
    median5 = bruteForce.bruteForceMedian(test5,9);
    median6 = bruteForce.bruteForceMedian(test6,9);

    int medianList[5] = {median1, median2, median3, median4,median5};

    functionalTesting(medianList,6);
    median1  = median.median(test1,9);
    median2 = median.median(test2,9);
    median3 = median.median(test3,9);
    median4 = median.median(test4,8);
    median5 = median.median(test5,9);
    median6 = median.median(test6,9);
    int medianList2[5] = {median1, median2, median3, median4,median5};
    functionalTesting(medianList,6);

    ofstream fileBrute,fileMedian,fileBruteTime,fileMedianTime;
    ios_base::open_mode mode = ios_base::app;
    fileBrute.open("/Users/arjaireynolds/QUT/2016/CAB301/Assignment2/resultsBrute.txt");
    fileMedian.open("/Users/arjaireynolds/QUT/2016/CAB301/Assignment2/resultsMedian.txt");
    fileBruteTime.open("/Users/arjaireynolds/QUT/2016/CAB301/Assignment2/resultsBruteTime.txt");
    fileMedianTime.open("/Users/arjaireynolds/QUT/2016/CAB301/Assignment2/resultsMedianTime.txt");
    srand((unsigned)time(0));
    int test[10000];
    testTime(test,fileBruteTime,fileMedianTime,bruteForce,median);
    long long basicOperation = 0;
    long long basicOperationMedian = 0;
    testNumberOfOperations(test,&basicOperation,&basicOperationMedian,fileBrute,fileMedian,bruteForce,median);
    cout<<basicOperation;
    fileBrute.close();
    fileMedian.close();
    return 0;
}
