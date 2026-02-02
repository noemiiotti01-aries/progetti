#include <stdio.h>
#include <conio.h>
#include <string.h> //strcmp()
#include <stdlib.h> //system()

int main(){

    char ch;
    char pass[20], saved_pass[20];

    FILE *ptr = fopen("password.txt", "r");
    if (ptr == NULL) {
        printf("Errore: impossibile aprire il file password.txt\n");
        return 1;
    }
    fscanf(ptr, "%19s", saved_pass);  // leggo max 19 caratteri
    fclose(ptr);

    while (1) {
        int i = 0;
        printf("Inserisci la password: ");

        while (1) {
            //legge un singolo carattere dalla tastiera senza visualizzarlo sullo schermo e attende l'input dell'utente. 
            //Questa funzione restituisce il valore ASCII del carattere letto come un intero
            ch = getch();

            if (ch == 13) { // Invio
                pass[i] = '\0';
                printf("\n"); // VA A CAPO QUI
                break;
            } else if (i < (int)sizeof(pass) - 1) {
                pass[i++] = ch;
                printf("*");
            }
        }

        if (strcmp(pass, saved_pass) == 0) {
            printf("LOGIN EFFETTUATO\n");
            break;
        } else {
            printf("PASSWORD INCORRETTA\n");
        }
    }

    return 0;
}
