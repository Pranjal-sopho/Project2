#include <stdio.h>
#include <cs50.h>
int main(){
    int min;
    // rejects invalid input until valid input is given
    do{
        printf("minutes: ");
        min = GetInt();
    }while(min<1);
    //prints no. of bottles of water 
    printf("bottles: %d\n", min*12);
    return 0;
}