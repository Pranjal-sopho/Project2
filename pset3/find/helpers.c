/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */

bool search1(int value, int values[], int l, int n)
{
    if(n<0)
    return false;
   if(l<=n){
        int m = (n+l)/2;
        if(values[m] == value){
            return true;
        }
        else if(values[m]>value){
            return search1(value, values, l, m-1);
        }
        else return search1(value, values, m+1, n);
    }
    /*
    for(int i=0; i<n; i++){
        if(values[i]==value){
            return true;
        }
    }*/
    return false;
}
bool search(int value, int values[], int n){
    int l=0;
    return search1(value, values, l, n-1);
}
/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // TODO: implement an O(n^2) sorting algorithm
    for(int i=0; i<n-1; i++){
        for(int j=0; j<n-i-1; j++){
            if(values[j]>values[j+1]){
                int temp = values[j];
                values[j] = values[j+1];
                values[j+1] = temp;
            }
        }
    }
}