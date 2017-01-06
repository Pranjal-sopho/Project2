#include <stdio.h>
#include <cs50.h>

int main(){
    int min;
    do{
        printf("enter number of minutes\n");
        min = GetInt(); // yell at user if not valid numer of minutes is given and ask again
    }while(min<0);
    printf("bottles: %d\n", min*12);// no. of bottles is 12 times mins
    return 0;
}