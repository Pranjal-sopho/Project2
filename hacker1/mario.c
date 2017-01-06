#include <stdio.h>
#include <cs50.h>

int main(){
    int height;
    printf("Enter a positive number less than 24\n");
    do{
        printf("Height: ");
        height = GetInt();
    }while(height < 0 || height > 23);
    for(int i=1; i<=height; i++){
        for(int j=0; j<height-i; j++){
            printf(" ");
        }
        for(int k=0; k<i; k++){
            printf("#");
        }
        printf("  ");
        for(int k=0; k<i; k++){
            printf("#");
        }
        for(int j=0; j<height-i; j++){
            printf(" ");
        }
        printf("\n");
    }
    return 0;
}