/**
 * fifteen.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Implements Game of Fifteen (generalized to d x d).
 *
 * Usage: fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [DIM_MIN,DIM_MAX]
 *
 * Note that usleep is obsolete, but it offers more granularity than
 * sleep and is simpler to use than nanosleep; `man usleep` for more.
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

// constants
#define DIM_MIN 3
#define DIM_MAX 9

// board
int board[DIM_MAX][DIM_MAX];

// dimensions
int d;

// prototypes
void clear(void);
bool GodMode(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);
void swap(int *a, int *b);

int main(int argc, string argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < DIM_MIN || d > DIM_MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            DIM_MIN, DIM_MIN, DIM_MAX, DIM_MAX);
        return 2;
    }

    // greet user with instructions
    greet();

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();

        // check for win
        if (won())
        {
            printf("ftw!\n");
            break;
        }

        // prompt for move
        printf("Tile to move: ");
            
        int tile = GetInt();
        if(tile > 60){
            printf("Entering GodMode\n");
            if(GodMode())
            printf("And that's how it's done\n");
            else printf("Seems like even I can't do that :( \n");
            return 0;
        }
        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep thread for animation's sake
        usleep(500000);
    }

    // success
    return 0;
}
bool GodMode(void){
    
    
    return false;
}
/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}
void swap(int *a, int *b){
    int t = *a;
    *a = *b;
    *b = t;
}
/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("WELCOME TO GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1
 * (i.e., fills 2D array with values but does not actually print them).  
 */
void init(void)
{
    int c = d*d-1;
    for(int  i=0; i<d; i++){
        for(int j=0; j<d; j++){
            board[i][j] = c;
            c--;
        }
    }
    if(d%2==0){
        swap(&board[d-1][d-3], &board[d-1][d-2]);
    }
}

/**
 * Prints the board in its current state.
 */
void draw(void)
{
    for(int i=0; i<d; i++){
        for(int index=0; index<=d*5; index++)
        printf("\033[22;33m-\033[0m");
        printf("\n\033[22;33m| \033[0m");
        
        for(int j=0; j<d; j++){
            if(board[i][j]==0)
            printf("_ ");
            else if(board[i][j]<10)
            board[i][j]==(i)*d+j+1?printf("\033[22;32m%d \033[0m", board[i][j]):printf("%d ", board[i][j]);
            else board[i][j]==(i-1)*4+j?printf("\033[22;32m%d\033[0m", board[i][j]):printf("%d", board[i][j]);
            printf( "\033[22;33m | \033[0m");
        }
        printf("\n");
    }
     for(int index=0; index<=d*5; index++)
        printf("\033[22;33m-\033[0m");
        printf("\n| ");
        
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
    if(tile>d*d-1)
    return false;
    int i,j,x,y;
    for(i=0; i<d; i++){
        for(j=0; j<d; j++){
            if(board[i][j] == tile)
            {
                x = i;
                y = j;
                i = d;
                j = d;
            }
        }
    }
    if(board[x-1][y] == 0 && x != 0){
        swap(&board[x-1][y], &board[x][y]);
        return true;
    }
    else if(board[x+1][y] == 0 && x != d-1){
        swap(&board[x+1][y], &board[x][y]);
        return true;
    }
    else if(board[x][y-1] == 0 && y != 0){
        swap(&board[x][y-1], &board[x][y]);
        return true;
    }
    else if(board[x][y+1] == 0 && y != d-1){
        swap(&board[x][y+1], &board[x][y]);
        return true;
    }
    return false;
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * else false.
 */
bool won(void)
{
    // TODO
     int num = 1;
    for(int i=0; i<d; i++){
        for(int j=0; j<d; j++){
            if(board[i][j] != num && !(i == d-1 && j == d-1))
            return false;
            num++;
        }
    }
    return false;
}