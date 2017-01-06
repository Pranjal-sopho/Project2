#include <stdio.h>
#include <cs50.h>
#include <string.h>
int main(){
    char* name;
    name = GetString();
    for(int i=0; i<strlen(name);i++){
        if(i==0||(name[i-1]==' '&& name[i]!=' ')){
            if(name[i]>=97 && name[i]<=122){
                printf("%c", name[i]-32);
            } 
            else if(name[i]>=65&&name[i]<=91)
            printf("%c", name[i]);
        }
    }
    printf("\n");
}