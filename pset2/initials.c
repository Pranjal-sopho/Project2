#include <stdio.h>
#include <cs50.h>
#include <string.h>
#include <stdlib.h>

int main(){
    string name;
    name = GetString();
    int i = 0, n = strlen(name);
    while(i <= n){          //iterate through the loop if it's first letter or first letter after space capitalize and print
        if(i == 0 || name[i-1] == ' '){
            printf("%c" ,name[i]>95?name[i]-32:name[i]);
        }
        i++;            //increment i
    }    
    printf("\n");
    return 0;
}