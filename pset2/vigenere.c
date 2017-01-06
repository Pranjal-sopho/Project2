#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>

int main(int argc, string argv[]){
    if(argc != 2){                                              //check is the keyphrase is given
        printf("you didn't give the key\n");
        return 1;
    }
    char* key;
    key = argv[1];
    int i = 0, j = 0, m = strlen(key);
    for(int c=0; c<m; c++){                                                     //confirms that the key is indeed alphabetical
        if(!isalpha(key[c])){
            printf("you didn't give the key\n");
            return 1;
        }
    }    
    char* msg;
    msg = GetString();
    int n = strlen(msg);
    for(int l=0; l<m; l++){                                                     //capitalise the key for later simplicity
        if(key[l]>96){
            key[l]-=32;
        }
    }
    while(i < n){
        j = j%m;                                                                //j wraps around key so that if key shorter than message then it can wrap around
        if(msg[i]>=65 && msg[i]<=90){                                           //handles it for capital letters
            printf("%c", (msg[i]-65+key[j]-65)%26+65);
            j++;
            i++;
            continue;
        }
        else if(msg[i]>=97 && msg[i]<=122){                                     //for small letters
            printf("%c", (msg[i]-97+key[j]-65)%26+97);
            j++;
            i++;
            continue;
        }
        else                                                                    //if there is some space or other character it prnts it as it is and doesn't increase index in key
        {
            printf("%c", msg[i]);
            i++;
        }
    }
    printf("\n");                                                               //changes the line
    return 0;
}