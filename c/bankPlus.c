#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#define FILE_ACCOUNTS "accounts.dat"
#define FILE_LOG "transactions.log"

typedef struct {
    int numero_conto;
    char nome[30];
    char pin[10];   // semplice PIN per autenticazione
    int saldo;
} Account;

void menu();
void creaConto();
void login();
void deposita(Account *u);
void preleva(Account *u);
void trasferisci(Account *u);
void mostraDettagli(Account *u);
void aggiornaConto(Account u);
void registraTransazione(const char *messaggio);

void divisore() { for (int i=0;i<50;i++) printf("-"); }

// ---------------- MAIN ----------------
int main() {
    int scelta;
    while (1) {
        system("cls"); 
        divisore();
        printf("\n\tBANCA - MENU PRINCIPALE\n");
        divisore();
        printf("\n1. Crea nuovo conto\n");
        printf("2. Login\n");
        printf("3. Esci\n");
        divisore();
        printf("\nScelta: ");
        scanf("%d", &scelta);

        switch (scelta) {
            case 1: creaConto(); break;
            case 2: login(); break;
            case 3: exit(0);
            default: printf("Scelta non valida!\n"); system("pause");
        }
    }
    return 0;
}

// ---------------- CREAZIONE CONTO ----------------
void creaConto() {
    Account u;
    FILE *fp = fopen(FILE_ACCOUNTS, "ab");
    if (!fp) { printf("Errore file.\n"); return; }

    printf("Inserisci numero conto: ");
    scanf("%d", &u.numero_conto);
    getchar(); // pulisce buffer

    printf("Nome titolare: ");
    fgets(u.nome, sizeof(u.nome), stdin);
    u.nome[strcspn(u.nome, "\n")] = 0;

    printf("Imposta PIN (max 8 cifre): ");
    scanf("%s", u.pin);

    u.saldo = 1000; // saldo iniziale
    fwrite(&u, sizeof(Account), 1, fp);
    fclose(fp);

    printf("Conto creato con successo!\n");
    system("pause");
}

// ---------------- LOGIN ----------------
void login() {
    int conto;
    char pin[10];
    Account u;
    int trovato = 0;

    printf("Numero conto: ");
    scanf("%d", &conto);
    printf("PIN: ");
    scanf("%s", pin);

    FILE *fp = fopen(FILE_ACCOUNTS, "rb");
    if (!fp) { printf("Nessun conto trovato.\n"); system("pause"); return; }

    while (fread(&u, sizeof(Account), 1, fp)) {
        if (u.numero_conto == conto && strcmp(u.pin, pin) == 0) {
            trovato = 1;
            break;
        }
    }
    fclose(fp);

    if (!trovato) {
        printf("Credenziali non valide.\n");
        system("pause");
        return;
    }

    // menu utente autenticato
    int scelta;
    do {
        system("cls");
        divisore();
        printf("\nBenvenuto, %s (Conto %d)\n", u.nome, u.numero_conto);
        divisore();
        printf("\n1. Deposita\n2. Preleva\n3. Trasferisci\n4. Dettagli conto\n5. Logout\nScelta: ");
        scanf("%d", &scelta);
        switch (scelta) {
            case 1: deposita(&u); break;
            case 2: preleva(&u); break;
            case 3: trasferisci(&u); break;
            case 4: mostraDettagli(&u); break;
            case 5: aggiornaConto(u); break;
            default: printf("Scelta non valida!\n"); system("pause");
        }
    } while (scelta != 5);
}

// ---------------- OPERAZIONI ----------------
void deposita(Account *u) {
    int importo;
    printf("Importo da depositare: ");
    scanf("%d", &importo);
    if (importo <= 0) { printf("Importo non valido.\n"); system("pause"); return; }
    u->saldo += importo;

    char msg[100];
    sprintf(msg, "Conto %d: Depositati %d €", u->numero_conto, importo);
    registraTransazione(msg);

    printf("Deposito effettuato. Nuovo saldo = %d €\n", u->saldo);
    system("pause");
}

void preleva(Account *u) {
    int importo;
    printf("Importo da prelevare: ");
    scanf("%d", &importo);
    if (importo <= 0) { printf("Importo non valido.\n"); system("pause"); return; }
    if (u->saldo < importo) { printf("Saldo insufficiente.\n"); system("pause"); return; }

    u->saldo -= importo;

    char msg[100];
    sprintf(msg, "Conto %d: Prelevati %d €", u->numero_conto, importo);
    registraTransazione(msg);

    printf("Prelievo effettuato. Nuovo saldo = %d €\n", u->saldo);
    system("pause");
}

void trasferisci(Account *u) {
    int conto_dest, importo;
    Account dest;
    int trovato = 0;

    printf("Numero conto destinatario: ");
    scanf("%d", &conto_dest);
    printf("Importo da trasferire: ");
    scanf("%d", &importo);

    if (importo <= 0 || u->saldo < importo) {
        printf("Operazione non valida (saldo insufficiente o importo errato).\n");
        system("pause");
        return;
    }

    FILE *fp = fopen(FILE_ACCOUNTS, "rb+");
    if (!fp) { printf("Errore file.\n"); return; }

    // cerca destinatario
    while (fread(&dest, sizeof(Account), 1, fp)) {
        if (dest.numero_conto == conto_dest) {
            trovato = 1;
            dest.saldo += importo;
            fseek(fp, -sizeof(Account), SEEK_CUR);
            fwrite(&dest, sizeof(Account), 1, fp);
            break;
        }
    }
    fclose(fp);

    if (!trovato) {
        printf("Conto destinatario non trovato.\n");
    } else {
        u->saldo -= importo;
        char msg[120];
        sprintf(msg, "Conto %d: Trasferiti %d € a conto %d", u->numero_conto, importo, conto_dest);
        registraTransazione(msg);
        printf("Trasferimento completato. Saldo attuale = %d €\n", u->saldo);
    }
    system("pause");
}

void mostraDettagli(Account *u) {
    printf("=== Dettagli conto ===\n");
    printf("Nome: %s\nNumero conto: %d\nSaldo: %d €\n", u->nome, u->numero_conto, u->saldo);
    system("pause");
}

// ---------------- AGGIORNAMENTO FILE ----------------
void aggiornaConto(Account u) {
    FILE *fp = fopen(FILE_ACCOUNTS, "rb+");
    if (!fp) return;
    Account temp;
    while (fread(&temp, sizeof(Account), 1, fp)) {
        if (temp.numero_conto == u.numero_conto) {
            fseek(fp, -sizeof(Account), SEEK_CUR);
            fwrite(&u, sizeof(Account), 1, fp);
            break;
        }
    }
    fclose(fp);
}

// ---------------- LOG OPERAZIONI ----------------
void registraTransazione(const char *messaggio) {
    FILE *fp = fopen(FILE_LOG, "a");
    if (!fp) return;
    time_t now = time(NULL);
    fprintf(fp, "[%s] %s\n", strtok(ctime(&now), "\n"), messaggio);
    fclose(fp);
}
