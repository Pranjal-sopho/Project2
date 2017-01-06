/**
 * copy.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Copies a BMP piece by piece, just because.
 */
       
#include <stdio.h>
#include <stdlib.h>

#include "bmp.h"

int main(int argc, char* argv[])
{
    // ensure proper usage
    if (argc != 4)
    {
        printf("Usage: ./copy multiplier infile outfile\n");
        return 1;
    }

    // remember filenames
    char* infile = argv[2];
    char* outfile = argv[3];
    int multiplier = atoi(argv[1]);
     if(multiplier > 100 ||  multiplier < 1)
    {
        printf("multiplier must be a positive int less than or equal to 100\n");
        return 1;
    }
    //open input file
    FILE* inptr = fopen(infile, "r");
    if (inptr == NULL)
    {
        printf("Could not open %s.\n", infile);
        return 2;
    }

    // open output file
    FILE* outptr = fopen(outfile, "w");
    if (outptr == NULL)
    {
        fclose(inptr);
        fprintf(stderr, "Could not create %s.\n", outfile);
        return 3;
    }

    // read infile's BITMAPFILEHEADER
    BITMAPFILEHEADER bf;
    fread(&bf, sizeof(BITMAPFILEHEADER), 1, inptr);

    // read infile's BITMAPINFOHEADER
    BITMAPINFOHEADER bi;
    fread(&bi, sizeof(BITMAPINFOHEADER), 1, inptr);

    // ensure infile is (likely) a 24-bit uncompressed BMP 4.0
    if (bf.bfType != 0x4d42 || bf.bfOffBits != 54 || bi.biSize != 40 || 
        bi.biBitCount != 24 || bi.biCompression != 0)
    {
        fclose(outptr);
        fclose(inptr);
        fprintf(stderr, "Unsupported file format.\n");
        return 4;
    }
    int h = abs(bi.biHeight), w = bi.biWidth;
    
    bi.biHeight = bi.biHeight*multiplier;
    bi.biWidth = bi.biWidth*multiplier;
    // determine padding for scanlines
    int padding =  (4 - (w * sizeof(RGBTRIPLE)) % 4) % 4;
    //new padding
    int pad = (4 - (bi.biWidth * sizeof(RGBTRIPLE)) % 4) % 4;
     // update image size
    bi.biSizeImage = abs(bi.biHeight) * ((bi.biWidth * sizeof (RGBTRIPLE)) + pad);
    
    // update file size
    bf.bfSize = bi.biSizeImage + sizeof (BITMAPFILEHEADER) + sizeof (BITMAPINFOHEADER); 

    // write outfile's BITMAPFILEHEADER
    fwrite(&bf, sizeof(BITMAPFILEHEADER), 1, outptr);

    // write outfile's BITMAPINFOHEADER
    fwrite(&bi, sizeof(BITMAPINFOHEADER), 1, outptr);
    // allocate storage for buffer to hold scanline
    RGBTRIPLE *buffer = malloc(sizeof(RGBTRIPLE) * (bi.biWidth));
    // iterate over infile's scanlines
    for (int i = 0; i < h; i++)
    {
        int z = 0;
        // iterate over pixels in scanline
        for (int j = 0; j < w; j++)
        {
            // temporary storage
            RGBTRIPLE triple;

            // read RGB triple from infile
            fread(&triple, sizeof(RGBTRIPLE), 1, inptr);

            for(int count = 0; count < multiplier; count++){
                *(buffer+z) = triple;
                z++;
            }
        }

        // skip over padding, if any
        fseek(inptr, padding, SEEK_CUR);
        for(int x =0; x < multiplier; x++)
        {
            fwrite(buffer, sizeof(RGBTRIPLE), bi.biWidth, outptr);
        // then add it back (to demonstrate how)
            for (int k = 0; k < pad; k++)
            {
                fputc(0x00, outptr);
            }
            
        }
    }
    free(buffer);
    // close infile
    fclose(inptr);

    // close outfile
    fclose(outptr);

    // that's all folks
    return 0;
}
