#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main(){
    float owed;
    do{
        printf("How much is owed?: \n");    //prompt user for input until valid input is given
        owed = GetFloat();
    }while(owed<0);
    owed *= 100; 
    int owedint = round(owed);
    int coins = 0;
    coins += owedint/25;        //gets bites of 25 until it can't anymore 
    owedint = owedint%25;
    coins += owedint/10;        //gets bytes of 10s
    owedint = owedint%10;
    coins += owedint/5;         //gets bytes of 5s
    owedint = owedint%5;
    coins += owedint;           // remaining are 1s
    printf("%d\n", coins);
    return 0;
}