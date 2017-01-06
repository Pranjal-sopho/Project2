#include <stdio.h>
#include <cs50.h>
//declarations
void CardType(long long);
bool IsInvalid(long long);
int main(){
    long long CardNumber;
    printf("Number: ");
    do{
        CardNumber = GetLongLong();
    }while(CardNumber <= 0);
    //check if the number is invalid
    if(IsInvalid(CardNumber)){
        printf("INVALID\n");
        return 0;
    }
    //identify type of card and print
    CardType(CardNumber);
    return 0;
}
void CardType(long long CardNumber){
    //checking conditions for each type and printing invalid if none of them satifies 
    if(CardNumber/10000000000000 == 34||CardNumber/10000000000000 == 37){
        printf("AMEX\n");
        return;
    }
    else if(CardNumber/1000000000000 == 4){
        printf("VISA\n");
        return;
    }
    else if(CardNumber/1000000000000000 == 4){
            printf("VISA\n");
            return;
    }
    else if(CardNumber/100000000000000>=51 && CardNumber/100000000000000<=55){
            printf("MASTERCARD\n");
            return;
    }
    else printf("INVALID\n");
}
bool IsInvalid(long long CardNumber){
    //storing the number in an array in reverse order
    int number[20] = {0};
    int i=0;
    while(CardNumber>0){
        number[i] = CardNumber%10;
        i++;
        CardNumber /= 10;
    }
    //traversing the number and appying the method 
    int j = i-2, sum = 0;
    while(j>=0){
        sum += number[j]*2;
        j -= 2;
    }
    j = i-1;
    while(j>=0){
        sum += number[j];
        j -= 2;
    }
    if(sum%10 == 0){
        return true;
    }
    return false;
}