// Il gioco deve essere giocato tra due persone (giocatore 1 e giocatore 2).
// Abbiamo assegnato 'X' al giocatore-1 e 'O' al giocatore-2.
// Il gioco inizia con il giocatore-1 e termina quando uno dei giocatori completa l'intera riga/colonna/diagonale riempita con il rispettivo simbolo (‘O’ o ‘X’).
// Se nessuno vince, allora la partita si dice pareggio.

#include <stdio.h>
#include <conio.h>  // getch()
#include <stdlib.h> // system()

char arr[10] = {'o','1','2','3','4','5','6','7','8','9'};

void showBoard();
int checkForWin();

int main() {
    int player = 1, choice, result;
    char mark;

    do {
        showBoard();
        player = (player % 2) ? 1 : 2;
        printf("Turno del giocatore %d : ", player);
        scanf("%d", &choice);

        mark = (player == 1) ? 'X' : 'O';

        if (choice >= 1 && choice <= 9 && arr[choice] == ('0' + choice)) {
            arr[choice] = mark;
        } else {
            printf("Mossa non valida!\n");
            player--; // rimane lo stesso giocatore
            getch();
        }

        result = checkForWin();
        player++;
    } while (result == -1);

    showBoard();

    if (result == 1)
        printf("Il giocatore %d ha vinto!\n", --player);
    else
        printf("Pareggio!\n");

    getch();
    return 0;
}

void showBoard() {
    system("cls");
    printf("\tTRIS\n");
    printf("       |       |      \n");
    printf("   %c   |   %c   |   %c   \n", arr[1], arr[2], arr[3]);
    printf("-------|-------|-------\n");
    printf("   %c   |   %c   |   %c   \n", arr[4], arr[5], arr[6]);
    printf("-------|-------|-------\n");
    printf("   %c   |   %c   |   %c   \n", arr[7], arr[8], arr[9]);
}

int checkForWin() {
    // righe
    if (arr[1]==arr[2] && arr[2]==arr[3]) return 1;
    if (arr[4]==arr[5] && arr[5]==arr[6]) return 1;
    if (arr[7]==arr[8] && arr[8]==arr[9]) return 1;

    // colonne
    if (arr[1]==arr[4] && arr[4]==arr[7]) return 1;
    if (arr[2]==arr[5] && arr[5]==arr[8]) return 1;
    if (arr[3]==arr[6] && arr[6]==arr[9]) return 1;

    // diagonali
    if (arr[1]==arr[5] && arr[5]==arr[9]) return 1;
    if (arr[3]==arr[5] && arr[5]==arr[7]) return 1;

    // nessuno vince, ma caselle finite = pareggio
    if (arr[1]!='1' && arr[2]!='2' && arr[3]!='3' &&
        arr[4]!='4' && arr[5]!='5' && arr[6]!='6' &&
        arr[7]!='7' && arr[8]!='8' && arr[9]!='9')
        return 0;

    return -1; // partita in corso
}
