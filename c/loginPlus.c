#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <string.h>
#include <windows.h>

struct account {
    char first_name[20];
    char last_name[20];
    char username[30];
    char phone[15];
    char gender;
    char DOB[15];
    char pass1[20];
};

void takepassword(char pass[20]) {
    int i = 0;
    char ch;
    while (1) {
        ch = getch();
        if (ch == 13) {  // invio
            pass[i] = '\0';
            break;
        } else if (ch == 8) {  // backspace
            if (i > 0) { i--; printf("\b \b"); }
        } else if (ch == 9 || ch == 32) {
            continue;
        } else {
            if (i < 19) {
                pass[i++] = ch;
                printf("*");
            }
        }
    }
}

// ----------------------------------------------------

void signup() {
    struct account u;
    char pass2[20];
    FILE *fp = fopen("account.txt", "ab"); // append binario
    if (!fp) {
        printf("Errore apertura file!\n");
        return;
    }

    system("cls");
    printf("=== CREA NUOVO ACCOUNT ===\n");
    printf("Nome: ");
    scanf("%s", u.first_name);
    printf("Cognome: ");
    scanf("%s", u.last_name);
    printf("Username: ");
    scanf("%s", u.username);
    printf("Telefono: ");
    scanf("%s", u.phone);
    printf("Genere (M/F): ");
    scanf(" %c", &u.gender);
    printf("Data di nascita: ");
    scanf("%s", u.DOB);

    printf("Password: ");
    takepassword(u.pass1);

    do {
        printf("\nConferma password: ");
        scanf("%s", pass2);
        if (strcmp(u.pass1, pass2) != 0) {
            printf("Le password non coincidono, riprova.\n");
        }
    } while (strcmp(u.pass1, pass2) != 0);

    fwrite(&u, sizeof(struct account), 1, fp);
    fclose(fp);

    printf("\nAccount creato con successo!\n");
    getch();
}

// ----------------------------------------------------

void login() {
    struct account u;
    char user[30], pass[20];
    FILE *fp = fopen("account.txt", "rb");
    if (!fp) {
        printf("Nessun account registrato.\n");
        getch();
        return;
    }

    system("cls");
    printf("=== LOGIN ===\n");
    printf("Username: ");
    scanf("%s", user);

    int found = 0;
    while (fread(&u, sizeof(u), 1, fp)) {
        if (strcmp(user, u.username) == 0) {
            found = 1;
            printf("Password: ");
            takepassword(pass);
            if (strcmp(pass, u.pass1) == 0) {
                printf("\nBenvenuto %s!\n", u.first_name);
            } else {
                printf("\nPassword errata.\n");
            }
            break;
        }
    }
    fclose(fp);

    if (!found) {
        printf("Username non trovato.\n");
    }
    getch();
}

// ----------------------------------------------------

void delete_account() {
    struct account u;
    char user[30];
    FILE *fp = fopen("account.txt", "rb");
    FILE *temp = fopen("temp.txt", "wb");
    if (!fp || !temp) {
        printf("Errore apertura file.\n");
        return;
    }

    system("cls");
    printf("=== ELIMINA ACCOUNT ===\n");
    printf("Username da eliminare: ");
    scanf("%s", user);

    int found = 0;
    while (fread(&u, sizeof(u), 1, fp)) {
        if (strcmp(user, u.username) == 0) {
            found = 1;
            printf("Account di %s eliminato.\n", u.username);
            continue; // non scrivere nel nuovo file
        }
        fwrite(&u, sizeof(u), 1, temp);
    }

    fclose(fp);
    fclose(temp);

    remove("account.txt");
    rename("temp.txt", "account.txt");

    if (!found) {
        printf("Nessun account trovato con username %s\n", user);
    }
    getch();
}

// ----------------------------------------------------

int menu() {
    int c;
    system("cls");
    printf("===== MENU PRINCIPALE =====\n");
    printf("1. Signup\n");
    printf("2. Login\n");
    printf("3. Elimina account\n");
    printf("4. Esci\n");
    printf("Scelta: ");
    scanf("%d", &c);
    return c;
}

int main() {
    while (1) {
        switch (menu()) {
            case 1: signup(); break;
            case 2: login(); break;
            case 3: delete_account(); break;
            case 4: exit(0);
            default: printf("Scelta non valida!\n"); getch();
        }
    }
}
