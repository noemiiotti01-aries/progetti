#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

char nome[20];
int saldo = 10000, conto_corrente, numero_operazioni = 0;

void deposita();
void preleva();
void trasferisci();
void mostraDettagli();
void mostraUltimoDettaglio();
void mostraStorico();
void menu();

void divisore() {
    for (int i = 0; i < 50; i++) printf("-");
}

// ---------------- MAIN ----------------
int main() {
    FILE *ptr = fopen("conto1.txt", "a"); // non sovrascrive più il file

    printf("Inserisci il tuo nome: ");
    fgets(nome, sizeof(nome), stdin);
    nome[strcspn(nome, "\n")] = 0; // rimuove l'eventuale a capo

    printf("Inserisci il numero di conto: ");
    scanf("%d", &conto_corrente);
    fprintf(ptr, "\nNome: %s\nConto: %d\n", nome, conto_corrente);

    fclose(ptr);

    int scelta;
    while (1) {
        menu();
        printf("\nInserisci la tua scelta: ");
        scanf("%d", &scelta);
        switch (scelta) {
            case 1: deposita(); break;
            case 2: preleva(); break;
            case 3: trasferisci(); break;
            case 4: mostraDettagli(); break;
            case 5: mostraStorico(); break;
            case 6: mostraUltimoDettaglio(); exit(0);
            default: printf("Scelta non valida!\n");
        }
    }
    return 0;
}

// ---------------- MENU ----------------
void menu() {
    system("cls"); // solo su Windows
    divisore();
    printf("\n\tMENU PRINCIPALE\n");
    divisore();
    printf("\n1. Deposita denaro\n");
    printf("2. Preleva denaro\n");
    printf("3. Trasferisci denaro\n");
    printf("4. Dettagli conto\n");
    printf("5. Storico operazioni\n");
    printf("6. Esci\n");
    divisore();
}

// ---------------- OPERAZIONI ----------------
void deposita() {
    int importo;
    time_t tm; time(&tm);
    FILE *ptr = fopen("conto1.txt", "a");

    printf("Inserisci l'importo da depositare: ");
    scanf("%d", &importo);
    if (importo <= 0) {
        printf("Importo non valido.\n"); return;
    }

    saldo += importo;
    printf("Depositati %d €. Saldo attuale = %d €\n", importo, saldo);
    fprintf(ptr, "Depositati: %d €\nData/Ora: %s\n", importo, ctime(&tm));
    numero_operazioni++;

    fclose(ptr);
    system("pause");
}

void preleva() {
    int importo;
    time_t tm; time(&tm);
    FILE *ptr = fopen("conto1.txt", "a");

    printf("Inserisci l'importo da prelevare: ");
    scanf("%d", &importo);
    if (importo <= 0) {
        printf("Importo non valido.\n"); return;
    }

    if (saldo < importo) {
        printf("Saldo insufficiente.\n");
    } else {
        saldo -= importo;
        printf("Prelevati %d €. Saldo attuale = %d €\n", importo, saldo);
        fprintf(ptr, "Prelevati: %d €\nData/Ora: %s\n", importo, ctime(&tm));
        numero_operazioni++;
    }
    fclose(ptr);
    system("pause");
}

void trasferisci() {
    int conto_dest, importo;
    time_t tm; time(&tm);
    FILE *ptr = fopen("conto1.txt", "a");

    printf("Inserisci il numero di conto destinatario: ");
    scanf("%d", &conto_dest);
    printf("Inserisci l'importo da trasferire: ");
    scanf("%d", &importo);

    if (importo <= 0) {
        printf("Importo non valido.\n"); return;
    }

    if (saldo < importo) {
        printf("Saldo insufficiente.\n");
    } else {
        saldo -= importo;
        printf("Trasferiti %d € al conto %d. Saldo attuale = %d €\n", importo, conto_dest, saldo);
        fprintf(ptr, "Trasferiti: %d € al conto %d\nData/Ora: %s\n", importo, conto_dest, ctime(&tm));
        numero_operazioni++;
    }
    fclose(ptr);
    system("pause");
}

void mostraDettagli() {
    printf("Dettagli conto\n");
    divisore();
    printf("\nNome: %s\nNumero conto: %d\nSaldo attuale: %d €\nOperazioni effettuate: %d\n",
           nome, conto_corrente, saldo, numero_operazioni);
    system("pause");
}

void mostraStorico() {
    FILE *ptr = fopen("conto1.txt", "r");
    if (!ptr) {
        printf("Nessun file di storico trovato.\n");
        return;
    }
    printf("=== Storico Operazioni ===\n");
    char c;
    while ((c = fgetc(ptr)) != EOF) {
        putchar(c);
    }
    fclose(ptr);
    system("pause");
}

void mostraUltimoDettaglio() {
    printf("Dettagli finali\n");
    divisore();
    printf("\nNome: %s\nNumero conto: %d\nSaldo finale: %d €\n",
           nome, conto_corrente, saldo);
    printf("Arrivederci!\n");
    system("pause");
}
