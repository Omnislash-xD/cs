from random import randint

if __name__ == '__main__':
    p = 17
    g = 3
    print("p :",p)
    print("g :",g)
    
    a = 13
    b = 9
    
    A = int(pow(g,a,p))
    B = int(pow(g,b,p))
    
    print("A :",A)
    print("B :",B)
    
    SKey_A = int(pow(B,a,p))
    Skey_B = int(pow(A,b,p))
    
    print("Skey_A :",SKey_A)
    print("Skey_B :",Skey_B)