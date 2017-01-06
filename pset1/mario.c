#include <stdio.h>
#include <cs50.h>

int main(){
    int height;
    printf("Enter height < 23 and a non-negative number\n");
    do{
        printf("Height: ");
        height = GetInt();                          // ask user again until valid input is given
    }while(height < 0 || height >23);
    for(int i=1; i<=height; i++){                    // i number of #s in each step
        for(int j=0; j<height-i; j++){            //print appropriate number of spaces
            printf(" ");
        }
        for(int k=0; k<=i; k++){                    //print #s
            printf("#");
        }
        printf("\n");                               //change line
    }
    return 0;
}