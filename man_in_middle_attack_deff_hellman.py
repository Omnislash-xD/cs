from random import randint
if __name__=='__main__':
    P = 17
    G = 3
    
    a = 7
    b = 9
    
    c = 3
    d = 4
     
    print(" P :",P)
    print(" G :",G)
    print(" private a :",a)
    print(" private b :",b)
    print(" Attacker private c :",c)
    print(" Attacker private d :",d)
    
    A = int(pow(G,a,P))
    
    B = int(pow(G,b,P))
    
    C = int(pow(G,c,P))
    
    D = int(pow(G,d,P))
    # here the midddle man receives both of A's and B's both public A and B
    # then he replaces his values with the his Own Calculates values which are C and D and sends to A and B
    # consider here A receives D from middle man and B receives C from Middle man.
    secret_key_A = int(pow(G,D,P))
    
    secret_key_B = int(pow(G,C,P))
        
    
    print("Secret key Of A :",secret_key_A)
    print("Secret key Of B :",secret_key_B)
    
    print("\nAll values attacker having with him :")
    print("Public G:",G," & P:",P)
    print("Private c:",c," & d:",d)
    print("Along with this he has A and B also :")
    print("A from alice :",A,"\nB from Bob :",B)
