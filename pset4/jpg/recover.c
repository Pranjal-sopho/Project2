/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */
#include <stdio.h>
#include <stdint.h>
#include <stdlib.h>
#include <string.h>

int main(int argc, char* argv[])
{
    FILE* fp = fopen("card.raw","r");
    if(fp == NULL){
        printf("error in opening card.raw :( ");
        fclose(fp);
        return 1;
    }
    uint8_t checkjpg[16][4];
    for(int i=0; i<16; i++){
        checkjpg[i][0] = 0xff;
        checkjpg[i][1] = 0xd8;
        checkjpg[i][2] = 0xff;
        checkjpg[i][3] = 14*16+i;
    }
    int jpgcount = 0;
    FILE* outp;
    uint8_t buffer[512];
    fread(buffer, 512, 1, fp);
    int open = 0;
    while(fread(buffer, 512, 1, fp)>0){
        //check first four bytes
        int flag = 0;
        for(int i=0; i<16; i++){    
        if(memcmp(checkjpg[i], buffer, 4) == 0){
                char filename[7];
                sprintf(filename, "%03d.jpg", jpgcount);
                if(open == 0){
                    outp = fopen(filename, "w");
                    fwrite(buffer, sizeof(buffer), 1, outp);
                    open = 1;
                }
                if(open == 1){
                    fclose(outp);
                    outp = fopen(filename, "w");
                    fwrite(buffer, sizeof(buffer), 1, outp);
                    jpgcount++;
                }
                flag = 1;
                break;
            }
        }
        if(flag == 0 && open == 1){
            fwrite(buffer, sizeof(buffer), 1, outp);
        }
    }
    if(outp)
    fclose(outp);
        
    fclose(fp);
}
