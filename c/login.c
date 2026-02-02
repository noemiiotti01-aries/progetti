#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <string.h>
#include <time.h>
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
        if (ch == 13) {
            pass[i] = '\0';
            break;
        } else if (ch == 8) {
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

void signup() {
    struct account u;
    char pass2[20];
    system("cls");

    printf("CREAZIONE NUOVO ACCOUNT\n");
    printf("Nome: ");
    scanf("%s", u.first_name);
    printf("Cognome: ");
    scanf("%s", u.last_name);
    printf("Username: ");
    scanf("%s", u.username);
    printf("Telefono: ");
    scanf("%s", u.phone);
    printf("Genere (M/F): ");
    scanf(" %c", &u.gender);  // spazio prima di %c
    printf("Data di nascita (gg/mm/aaaa): ");
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

    FILE *fp = fopen("account1.txt", "wb");
    fwrite(&u, sizeof(struct account), 1, fp);
    fclose(fp);

    printf("\nAccount creato con successo!\n");
    getch();
}

void login() {
    struct account u;
    char user[30], pass[20];
    FILE *fp = fopen("account1.txt", "rb");
    if (!fp) {
        printf("Nessun account registrato.\n");
        getch();
        return;
    }
    fread(&u, sizeof(u), 1, fp);
    fclose(fp);

    system("cls");
    printf("Login\n");

    while (1) {
        printf("Username: ");
        scanf("%s", user);
        if (strcmp(u.username, user) == 0) break;
        printf("Username errato, riprova.\n");
    }

    while (1) {
        printf("Password: ");
        takepassword(pass);
        if (strcmp(u.pass1, pass) == 0) break;
        printf("\nPassword errata, riprova.\n");
    }

    printf("\nBenvenuto %s!\n", u.first_name);
    getch();
}

int menu() {
    int c;
    system("cls");
    printf("===== MENU PRINCIPALE =====\n");
    printf("1. Signup\n");
    printf("2. Login\n");
    printf("3. Esci\n");
    printf("Scelta: ");
    scanf("%d", &c);
    return c;
}

int main() {
    while (1) {
        switch (menu()) {
            case 1: signup(); break;
            case 2: login(); break;
            case 3: exit(0);
            default: printf("Scelta non valida!\n");
        }
    }
}