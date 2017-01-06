#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>

int main(int argc, string argv[]){
    if(argc != 2){                                  //check if the key is given or not
    printf("You should have entered the key\n");     
    return 1;
    }
    int k = atoi(argv[1]);                          //take k
    string msg;
    msg = GetString();
    int i = 0, n = strlen(msg);                     
    while(i<n){     
        if(msg[i]>=65 && msg[i]<=90){               //convert capital letters into capitals according to the formula
            printf("%c", (msg[i]-65+k)%26+65);   
        }
        else if(msg[i]>=97 && msg[i]<=122){         //convert small letters accordingly
            printf("%c", (msg[i]-97+k)%26+97);
        }
        else printf("%c", msg[i]);                  //if not a letter print it as it is
        i++;
    }
    printf("\n");                                   //change line
    return 0;
}