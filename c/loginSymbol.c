#include <stdio.h>
#include <string.h>
#include <conio.h>

int main() {
    char ch;
    char pass[20], saved_pass[20], user_name[20], saved_name[20];

    FILE *ptr = fopen("password.txt", "r");
    if (ptr == NULL) {
        printf("Errore: impossibile aprire password.txt\n");
        return 1;
    }
    fscanf(ptr, "%19s %19s", saved_name, saved_pass);
    fclose(ptr);

    // Verifica username
    while (1) {
        printf("Inserisci username: ");
        scanf("%19s", user_name);

        if (strcmp(user_name, saved_name) == 0) break;
        printf("\nUSERNAME INCORRETTO, riprova\n");
    }

    // Verifica password
    while (1) {
        printf("Inserisci password: ");
        int i = 0;
        while (1) {
            ch = getch();
            if (ch == 13) { // invio
                pass[i] = '\0';
                break;
            } else if (ch == 8) { // backspace
                if (i > 0) { 
                    i--; printf("\b \b"); 
                }
            } else if (ch == 9 || ch == 32) { // blocca tab e spazio
                continue;
            } else {
                if (i < sizeof(pass) - 1) {
                    pass[i++] = ch;
                    printf("*");
                }
            }
        }

        if (strcmp(pass, saved_pass) == 0) {
            printf("\nLOGIN EFFETTUATO CON SUCCESSO\n");
            break;
        } else {
            printf("\nPASSWORD INCORRETTA, riprova\n");
        }
    }

    return 0;
}