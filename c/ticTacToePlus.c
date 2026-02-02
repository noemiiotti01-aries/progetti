#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <time.h>

char arr[10]; // tabellone dinamico

// Prototipi
void menu();
void initBoard();
void showBoard();
int checkForWin();
void playGame();
void salvaRisultato(const char *risultato);

int main() {
    int scelta;

    do {
        menu();
        printf("\nScegli un'opzione: ");
        scanf("%d", &scelta);

        switch(scelta) {
            case 1:
                playGame();
                break;
            case 2: {
                system("cls");
                FILE *f = fopen("storico.txt", "r");
                if (!f) {
                    printf("Nessuno storico disponibile.\n");
                } else {
                    printf("=== STORICO PARTITE ===\n\n");
                    char c;
                    while ((c = fgetc(f)) != EOF) {
                        putchar(c);
                    }
                    fclose(f);
                }
                printf("\nPremi un tasto per continuare...");
                getch();
                break;
            }
            case 3:
                printf("Uscita dal gioco...\n");
                break;
            default:
                printf("Scelta non valida!\n");
                getch();
        }
    } while(scelta != 3);

    return 0;
}

// Menu principale
void menu() {
    system("cls");
    printf("=== MENU TRIS ===\n");
    printf("1. Nuova partita\n");
    printf("2. Mostra storico\n");
    printf("3. Esci\n");
}

// Inizializza tabellone
void initBoard() {
    for (int i = 1; i <= 9; i++) {
        arr[i] = '0' + i; // '1'..'9'
    }
}

// Mostra tabellone
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

// Controlla vincitore
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

    // pareggio
    if (arr[1]!='1' && arr[2]!='2' && arr[3]!='3' &&
        arr[4]!='4' && arr[5]!='5' && arr[6]!='6' &&
        arr[7]!='7' && arr[8]!='8' && arr[9]!='9')
        return 0;

    return -1; // partita in corso
}

// Giocare una partita
void playGame() {
    int player = 1, choice, result;
    char mark;

    initBoard();

    do {
        showBoard();
        player = (player % 2) ? 1 : 2;
        printf("\nTurno del Giocatore %d : ", player);
        scanf("%d", &choice);

        mark = (player == 1) ? 'X' : 'O';

        if (choice >= 1 && choice <= 9 && arr[choice] == ('0' + choice)) {
            arr[choice] = mark;
        } else {
            printf("Mossa non valida! Riprova.\n");
            player--;
            getch();
        }

        result = checkForWin();
        player++;
    } while (result == -1);

    showBoard();

    if (result == 1) {
        printf("\nIl Giocatore %d ha vinto!\n", --player);

        char buffer[100];
        sprintf(buffer, "Vittoria Giocatore %d\n", player);
        salvaRisultato(buffer);
    } else {
        printf("\nPareggio!\n");
        salvaRisultato("Pareggio\n");
    }

    printf("\nPremi un tasto per tornare al menu...");
    getch();
}

// Salva esito della partita nello storico
void salvaRisultato(const char *risultato) {
    FILE *f = fopen("storico.txt", "a");
    if (!f) return;

    time_t t;
    time(&t);
    fprintf(f, "[%s] %s", ctime(&t), risultato);
    fclose(f);
}
